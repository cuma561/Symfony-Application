#!/bin/sh

BRANCH=$(git rev-parse --abbrev-ref HEAD)
BRANCH_REV_COUNT=$(git rev-list --count HEAD)
LAST_HASH_SHORT=$(git rev-parse --short HEAD)
LAST_TAG=$(git describe --tags)

echo -n "$LAST_TAG"
