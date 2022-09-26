#!/usr/bin/env bash

TARGET_PATH=$1
CURRENT_DIR=`pwd`
SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )

echo $TARGET_PATH
echo $SCRIPT_DIR

cp -aR $SCRIPT_DIR/public_html/* $TARGET_PATH