#!/bin/bash
git add *
git commit -m "$1"
git push --force-with-lease -u origin main
