/*
 * 应用于 图书搜索页面
 * recordUrl.js 主要作用是记录 Url，为了在 图书搜索结果中点击了 “删除” （例如是删除） ，后
 * 经程序后台处理后，还能回到点击删除按钮之前的 图书搜索结果 页面的特定页码上，
 * 就要通过此脚本记录下点击 “删除” 按钮之前的 Url ，通过session 保存起来。
 * 等待 “删除” 程序处理完成后，再把 session 存入的 url 值取出，跳转回原先的页面.
 *
 */