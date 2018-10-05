<?php
/**
 * @Author: Paul P.
 * @Date:   2015-11-09 16:09:25
 * @Last Modified by:   Paul P
 * @Last Modified time: 2018-10-05 13:17:00
 */

namespace hmphu\deathbycaptcha\Factory;


use hmphu\deathbycaptcha\DeathByCaptchaClient;
use hmphu\deathbycaptcha\DeathByCaptchaHttpClient;
use hmphu\deathbycaptcha\DeathByCaptchaSocketClient;
use hmphu\deathbycaptcha\Exception\DeathByCaptchaRuntimeException;

/**
 * Class DeathByCaptchaClientFactory
 * @package hmphu\deathbycaptcha\Factory
 */
class DeathByCaptchaClientFactory
{
    const CLIENT_SOCKET = 'socket';
    const CLIENT_HTTP = 'http';

    /**
     * @param string $username
     * @param string $password
     * @param string $type
     * @return DeathByCaptchaClient
     * @throws DeathByCaptchaRuntimeException
     */
    public static function make($username, $password, $type)
    {
        switch ($type) {
            case self::CLIENT_SOCKET:
                return new DeathByCaptchaSocketClient($username, $password);
            case self::CLIENT_HTTP:
                return new DeathByCaptchaHttpClient($username, $password);
            default:
                throw new DeathByCaptchaRuntimeException('Unable to instantiate client : '. $type);
        }
    }
}