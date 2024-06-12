class ErrorCode
{
    // 错误码常量
    const SUCCESS_CODE = 0;
    const ERROR_UNKNOWN_CODE = 1000;
    const ERROR_PARAMETER_INVALID_CODE = 1001;
    const ERROR_DATABASE_QUERY_FAILED_CODE = 1002;
    const ERROR_RESOURCE_NOT_FOUND_CODE = 1003;

    // 错误信息数组，使用常量作为键
    private static $errorMessages = [
        self::SUCCESS_CODE => '操作成功',
        self::ERROR_UNKNOWN_CODE => '未知错误',
        self::ERROR_PARAMETER_INVALID_CODE => '参数无效',
        self::ERROR_DATABASE_QUERY_FAILED_CODE => '数据库查询失败',
        self::ERROR_RESOURCE_NOT_FOUND_CODE => '资源未找到',
    ];

    // 获取错误信息的方法
    public static function getErrorMessage($code)
    {
        return isset(self::$errorMessages[$code]) ? self::$errorMessages[$code] : '未知错误码';
    }
}
