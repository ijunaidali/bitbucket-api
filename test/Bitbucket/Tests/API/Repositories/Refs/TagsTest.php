<?php

namespace Bitbucket\Tests\API\Repositories\Refs;

use Bitbucket\Tests\API as Tests;

class TagsTest extends Tests\TestCase
{
    public function testAll()
    {
        $endpoint       = 'repositories/gentle/eof/refs/tags';
        $expectedResult = $this->addFakeResponse(json_encode('dummy'));

        /** @var $repository \Bitbucket\API\Repositories\Refs\Tags */
        $repository = $this->getApiMock('Bitbucket\API\Repositories\Refs\Tags');

        $actual = $repository->all('gentle', 'eof');

        $this->assertEquals($expectedResult, $actual);

        $request = $this->mockClient->getLastRequest();

        $this->assertSame('/2.0/' . $endpoint, $request->getUri()->getPath());
        $this->assertSame('GET', $request->getMethod());
    }

    public function testAllParams()
    {
        $params         = ['pagelen'=>36];
        $endpoint       = 'repositories/gentle/eof/refs/tags';
        $expectedResult = $this->addFakeResponse(json_encode('dummy'));

        /** @var $repository \Bitbucket\API\Repositories\Refs\Tags */
        $repository = $this->getApiMock('Bitbucket\API\Repositories\Refs\Tags');

        $actual = $repository->all('gentle', 'eof', $params);

        $this->assertEquals($expectedResult, $actual);

        $request = $this->mockClient->getLastRequest();

        $this->assertSame('/2.0/' . $endpoint, $request->getUri()->getPath());
        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('pagelen=36', $request->getUri()->getQuery());
    }

    public function testGet()
    {
        $endpoint       = 'repositories/gentle/eof/refs/tags/atag';
        $expectedResult = $this->addFakeResponse(json_encode('dummy'));

        /** @var $repository \Bitbucket\API\Repositories\Refs\Tags */
        $repository = $this->getApiMock('Bitbucket\API\Repositories\Refs\Tags');

        $actual = $repository->get('gentle', 'eof', 'atag');

        $this->assertEquals($expectedResult, $actual);

        $request = $this->mockClient->getLastRequest();

        $this->assertSame('/2.0/' . $endpoint, $request->getUri()->getPath());
        $this->assertSame('GET', $request->getMethod());
    }

    public function testCreate()
    {
        $endpoint       = 'repositories/gentle/eof/refs/tags';
        $expectedResult = $this->addFakeResponse(json_encode('dummy'));

        /** @var $repository \Bitbucket\API\Repositories\Refs\Tags */
        $repository = $this->getApiMock('Bitbucket\API\Repositories\Refs\Tags');

        $actual = $repository->create('gentle', 'eof', 'atag', '2310abb944423ecf1a90be9888dafd096744b531');

        $this->assertEquals($expectedResult, $actual);

        $request = $this->mockClient->getLastRequest();

        $this->assertSame('/2.0/' . $endpoint, $request->getUri()->getPath());
        $this->assertSame('POST', $request->getMethod());
    }
}
