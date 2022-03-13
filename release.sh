#!/bin/zsh

if [ $# -eq 0 ]; then
    echo "Please supply the version number as an argument."
fi

read -p "Releaseing v$1. Did you push all necessary changes to master? (y/n) " remember

if [ $remember != 'y' ]; then 
    echo "\nCome back when you are ready! Aborting Release …"
    exit 1
fi

# Set release version
git checkout -b release/v$1 origin/master

git add .
git commit -m "Release v$1"
git tag -a v$1 -m "Release v$1"
git push origin --tags

# Exit and delete
git co master
git branch -D release/v$1

cd -