#!/bin/sh
# Install repository-shared git hooks by setting core.hooksPath

git config core.hooksPath .githooks
if [ $? -ne 0 ]; then
  echo "Failed to set core.hooksPath"
  exit 1
fi
chmod +x .githooks/post-checkout 2>/dev/null || true
echo "Installed repo-shared hooks (core.hooksPath set to .githooks)"
