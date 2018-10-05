<?php

namespace hmphu\deathbycaptcha\test;

use hmphu\deathbycaptcha\DeathByCaptchaClient;
use hmphu\deathbycaptcha\DeathByCaptchaHttpClient;
use hmphu\deathbycaptcha\DeathByCaptchaSocketClient;
use hmphu\deathbycaptcha\Factory\DeathByCaptchaClientFactory;

/**
 * Class DeathByCaptchaClientFactoryTest
 * @package hmphu\deathbycaptcha\test
 */
class DeathByCaptchaClientFactoryTest extends TestCase
{
    /**
     * This test should pass factory should return instance of DeathByCaptchaSocketClient
     *
     * @throws \hmphu\deathbycaptcha\Exception\DeathByCaptchaRuntimeException
     */
    public function testShouldReturnSocketClient()
    {
        /** @var DeathByCaptchaSocketClient $client */
        $client = $this->genericTest(DeathByCaptchaClientFactory::CLIENT_SOCKET);

        $this->assertInstanceOf(DeathByCaptchaSocketClient::class, $client);
    }

    /**
     * This test should pass factory should return instance of DeathByCaptchaHttpClient
     *
     * @throws \hmphu\deathbycaptcha\Exception\DeathByCaptchaRuntimeException
     */
    public function testShouldReturnHttpClient()
    {
        /** @var DeathByCaptchaHttpClient $client */
        $client = $this->genericTest(DeathByCaptchaClientFactory::CLIENT_HTTP);

        $this->assertInstanceOf(DeathByCaptchaHttpClient::class, $client);
    }

    /**
     * @throws \hmphu\deathbycaptcha\Exception\DeathByCaptchaRuntimeException
     * @expectedException \hmphu\deathbycaptcha\Exception\DeathByCaptchaRuntimeException
     */
    public function testShouldFailWithException()
    {
        $this->genericTest('test');
    }

    /**
     * @param $clientType
     * @return DeathByCaptchaClient
     * @throws \hmphu\deathbycaptcha\Exception\DeathByCaptchaRuntimeException
     */
    protected function genericTest($clientType)
    {
        return DeathByCaptchaClientFactory::make(
            'test',
            'test',
            $clientType
        );
    }
}