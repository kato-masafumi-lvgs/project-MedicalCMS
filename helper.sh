#!/bin/bash

set -eu

function error() {
    stopSpinner $spinner_pid
    exit 1
}

# Display "/-\|" characters to show the task is running.
function startSpinner() {

    local i=1
    local symbols='\|/-'
    local delay=0.15

    while :
    do
        printf "\r${symbols:i++%${#symbols}:1}"
        sleep $delay
    done

}

function stopSpinner() {
    local pid=${1}
    if [ -z $pid ]; then
        echo 'Spinner is not runnning.'
        exit
    fi

    kill $pid > /dev/null 2>&1
    unset spinner_pid
}

function verifyGitVersion() {

    local MINIMUM_GIT_VERSION=2.9.1
    local git_version=$(git --version | awk '{print $3}')
    local lower_version=$(echo -e "$git_version\n$MINIMUM_GIT_VERSION" | sort -V | head -1)

    if [ $lower_version = $git_version ]; then
        echo "現在のGitのバージョンは${git_version}です。"
        echo "Gitのバージョンを${MINIMUM_GIT_VERSION}以上に更新して下さい。"

        error
    fi
}

function installNpmPackages() {
    # --no-binlinks option is for vagrant on windows.
    npm install --no-bin-links
}

function removeGitDirectory() {
    if [ -e ./.git ]; then
        rm -rf ./.git
    fi
}

function removeComposerLock() {
    if [ -e ./composer.lock ]; then
        rm ./composer.lock
    fi
}

function chooseRepositoryKey() {
    kill -STOP $spinner_pid
    read -p " key: " key
    kill -CONT $spinner_pid
    local url=`grep -o "${key}\s*=\s*.*" config | tr '=' '\n' | tail -1`
    echo $url
}

function cloneLaravelRepository() {
    if [ -e ./laravel ]; then
        echo ' Laravel Project already exists.'
        echo ' Existing the setup tasks...'

        error
    fi

    git clone ${@}
}

function executeInitialCommit() {
    git init .
    git add -A > /dev/null
    git commit -m "Project setup."
}

function changeGithookPath() {
    if [ -e ./.git/config ]; then
        echo -e "\n[core]\n\thooksPath=./vendor/lvgs/tool-GitHooks/hooks" >> .git/config
        echo ' hooks directory changed.'
    fi
}

function setup() {

    echo '*********************************************'
    echo '* Run Setup Script.'
    echo '*********************************************'

    base_path=`pwd`

    echo -e '\n---------------------------------------------'
    echo ' Verify the version of git.'
    echo '---------------------------------------------'
    verifyGitVersion

    echo -e '\n---------------------------------------------'
    echo ' Base Project: Installing npm packages.'
    echo '---------------------------------------------'
    installNpmPackages

    echo -e '\n---------------------------------------------'
    echo ' Remove .git in Base Project.'
    echo '---------------------------------------------'
    removeGitDirectory

    echo -e '\n---------------------------------------------'
    echo ' Choose your project.'
    echo '---------------------------------------------'
    local url=`chooseRepositoryKey`
    if [ -z "${url}" ]; then
        echo -e '\n---------------------------------------------'
        echo ' Key is not found...'
        echo ' Check a key and try again...'
        echo '---------------------------------------------'
        error
    fi

    echo -e '\n---------------------------------------------'
    echo ' Clone Laravel Repository.'
    echo '---------------------------------------------'
    cloneLaravelRepository $url

    cd laravel

    echo -e '\n---------------------------------------------'
    echo ' Remove .git in Laravel Project.'
    echo '---------------------------------------------'
    removeGitDirectory

    echo -e '\n---------------------------------------------'
    echo ' Remove composer.lock in Laravel Project.'
    echo '---------------------------------------------'
    removeComposerLock

    # Change current directory to the base project path.
    cd $base_path

    echo -e '\n---------------------------------------------'
    echo ' Commit Project.'
    echo '---------------------------------------------'
    executeInitialCommit

    echo -e '\n---------------------------------------------'
    echo ' Change git hooks directory path.'
    echo '---------------------------------------------'
    changeGithookPath

    echo -e '\n*********************************************'
    echo '* Completed.'
    echo '*********************************************'

}
