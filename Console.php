<?php
class Console
{
    private $static $commands = [];
    /**
     * ssert方法接受两个参数，第一个参数是表达式，第二个参数是字符串。只有当第一个参数为false，才会输出第二个参数，否则不会有任何结果。
     */
    public static function assert()
    {}

    /**
     * 	清除当前控制台的所有输出，将光标回置到第一行。
     */
    public static function clear()
    {}

    /**
     * 用于计数，输出它被调用了多少次。
     */
    public static function count()
    {}

    /**
     * 重置指定标签的计数器值
     */
    public static function countReset()
    {}

    /**
     * 控制台打印一条 "debug" 级别的日志消息
     */
    public static function debug()
    {}

    /**
     * 打印一条以三角形符号开头的语句，可以点击三角展开查看对象的属性。This listing lets you use disclosure triangles to examine the contents of child objects.
     */
    public static function dir()
    {}

    /**
     * 打印 XML/HTML 元素表示的指定对象，否则显示 JavaScript 对象视图
     */
    public static function dirxml()
    {}

    /**
     * 输出信息时，在最前面加一个红色的叉，表示出错，同时会显示错误发生的堆栈。
     */
    public static function error()
    {}

    /**
     * error() 方法的别称
     */
    public static function exception()
    {}

    /**
     * 用于将显示的信息分组，可以把信息进行折叠和展开。
     */
    public static function group()
    {}

    /**
     * 与console.group方法很类似，唯一的区别是该组的内容，在第一次显示时是收起的（collapsed），而不是展开的。
     */
    public static function groupCollapsed()
    {}

    /**
     * 结束内联分组
     */
    public static function groupEnd()
    {}

    /**
     * console.log 别名，输出信息
     */
    public static function info()
    {}

    /**
     * 输出信息
     */
    public static function log()
    {}

    /**
     * Starts the browser's built-in profiler (for example, the Firefox performance tool).
     * You can specify an optional name for the profile.
     */
    public static function profile()
    {}

    /**
     * Stops the profiler.
     * You can see the resulting profile in the browser's performance tool (for example, the Firefox performance tool).
     */
    public static function profileEnd()
    {}

    /**
     * 将复合类型的数据转为表格显示。
     */
    public static function table()
    {}

    /**
     * 计时开始
     */
    public static function time()
    {}

    /**
     * 计时结束
     */
    public static function timeEnd()
    {}

    /**
     * Logs the value of the specified timer to the console.
     */
    public static function timeLog()
    {}

    /**
     * 添加一个标记到浏览器的 Timeline 或 Waterfall 工具。
     */
    public static function timeStamp()
    {}

    /**
     * 追踪函数的调用过程
     */
    public static function trace()
    {}

    /**
     * 输出警告信息
     */
    public static function warn()
    {
        self::build('warn')
    }
    
    public static function build($command)
    {
        $command = "console.{$command}()";
        self::$command[] = 
    }
    
    public static function output()
    {
        
    }
}
