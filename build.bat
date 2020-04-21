@echo off

git symbolic-ref --short -q HEAD > version

git clone https://github.com/rok9ru/trpo-core ./core