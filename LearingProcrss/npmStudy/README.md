npm -v          #显示版本，检查npm 是否正确安装。  
npm install express   #安装express模块  
npm install -g express  #全局安装express模块  
npm list         #列出已安装模块  
npm show express     #显示模块详情  
npm update        #升级当前目录下的项目的所有模块  
npm update express    #升级当前目录下的项目的指定模块  
npm update -g express  #升级全局安装的express模块  
npm uninstall express  #删除指定的模块
更新NPM（sudo npm install npm@latest -g || npm update -g）
更新node.js(sudo npm install -g n ->sudo n latest)如报错(升级失败)需在前加（sudo npm cache clean -f）