fork：拉取某个项目建立属于自己的分支
git clone+(url)克隆到本地，此时有一个默认的远程origin仓库，对应着一个默认的主分支master
git remote -v 查看远程仓库
 git remote add +远程仓库名+(url)添加远程仓库
 git add .
 git commit -m ''
$ git push origin(仓库名)

上面命令表示，将当前分支推送到origin主机的对应分支。 

如果当前分支只有一个追踪分支，那么主机名都可以省略。 

$ git push 如果当前分支与多个主机存在追踪关系，那么这个时候-u选项会指定一个默认主机，这样后面就可以不加任何参数使用git push。

$ git push -u origin master 上面命令将本地的master分支推送到origin主机，同时指定origin为默认主机，后面就可以不加任何参数使用git push了。

不带任何参数的git push，默认只推送当前分支，这叫做simple方式。此外，还有一种matching方式，会推送所有有对应的远程分支的本地分支。Git 2.0版本之前，默认采用matching方法，现在改为默认采用simple方式。
push成功之后,可以通过request向主分支(项目)发送合并请求
git pull 拉取项目
git pull origin 分支

//出现错误

git stash  缓存起来

git pull origin 分支

git stash pop //还原

git stash clear
