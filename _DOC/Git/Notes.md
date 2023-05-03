# MERGE VS REBASE

Personally I prefer to merge instead of rebase, for many reasons:

- Rebase overwrite the target branch commits history;
- Merge keeps the commits and add a new commit;
- Merge make possible to revert to a point before the merge;

Merge `main` into `feature`:

```shell
  git merge feature main
```

![Merge](img/merge-vs-rebase_merge-feature-into-master.png)

<https://www.atlassian.com/git/tutorials/merging-vs-rebasing>
