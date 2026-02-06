# Auto-publish branches (local setup)

This repository includes a repo-shared Git hook that will automatically push
newly checked-out branches to the `origin` remote and set the branch upstream
if the branch does not already exist on `origin`.

Files added:
- `.githooks/post-checkout` — hook script that runs after `git checkout`.
- `scripts/install-githooks.sh` — helper to enable the repo hooks (`git config core.hooksPath .githooks`).

Usage (local developer):

1. Run the installer from the repository root:

```sh
sh scripts/install-githooks.sh
```

2. From now on, when you create a branch with `git checkout -b feature/foo`,
   the hook will detect the branch and run `git push -u origin feature/foo`
   automatically if that branch doesn't already exist on `origin`.

Notes:
- Hooks run locally — each developer should run the installer once.
- On Windows, run the installer from Git Bash or a POSIX shell.
- If you prefer not to use repo-shared hooks, manually run `git push -u origin <branch>`.
