<?php

namespace kevincobain2000\tests;

use kevincobain2000\Gfycat;

class GfycatTest extends \PHPUnit_Framework_TestCase
{
    public function setup()
    {
        $this->clientId = '';
        $this->clientSecret = '';
    }
    public function testGetOauthToken()
    {
        $gfycat = new Gfycat($this->clientId, $this->clientSecret);
        $token = $gfycat->getOauthToken();

        $this->assertNotEmpty($token);
    }

    public function testGet()
    {
        $gfycat = new Gfycat($this->clientId, $this->clientSecret);

        $gfyid = 'heartfeltsorrowfulbushsqueaker';
        $response = $gfycat->get($gfyid);

        $this->assertSame($gfyid, $response['gfyItem']['gfyId']);
    }

    public function testSearch()
    {
        $gfycat = new Gfycat($this->clientId, $this->clientSecret);

        $query = 'keywords';
        $response = $gfycat->search($query);

        $this->assertTrue($response['found'] >  1);
    }
}
