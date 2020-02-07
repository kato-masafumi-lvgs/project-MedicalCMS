#!/bin/bash

set -eu

# Load setup tasks.
. ./helper.sh

# Display spinner to show the setup is running.
startSpinner &
spinner_pid=$!

# Setup Project.
# Stop spinner even if error has occured.
setup || error

# Stop spinner after the setup completed.
stopSpinner $spinner_pid
