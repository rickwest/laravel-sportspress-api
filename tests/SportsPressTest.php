<?php

namespace RickWest\SportsPress\Tests;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;
use RickWest\SportsPress\Facades\SportsPress as SportsPressFacade;
use RickWest\SportsPress\Resources\Calendars;
use RickWest\SportsPress\Resources\Events;
use RickWest\SportsPress\Resources\Leagues;
use RickWest\SportsPress\Resources\Players;
use RickWest\SportsPress\Resources\Roles;
use RickWest\SportsPress\Resources\Seasons;
use RickWest\SportsPress\Resources\Staff;
use RickWest\SportsPress\Resources\Teams;
use RickWest\SportsPress\Resources\Venues;
use RickWest\SportsPress\SportsPress;
use RickWest\WordPress\Resources\Resource;

class SportsPressTest extends TestCase
{
    public SportsPress $sportspress;

    public function setUp(): void
    {
        parent::setUp();

        Config::set('wordpress-api.url', 'https://example.com');

        $this->sportspress = app(SportsPress::class);
    }

    public function testCanBeInstantiated(): void
    {
        $this->assertInstanceOf(SportsPress::class, new SportsPress());
    }

    public function testFacadeReturnsInstanceOfSportsPress(): void
    {
        $this->assertInstanceOf(SportsPress::class, SportsPressFacade::getFacadeRoot());
    }

    public function testHelperReturnsInstanceOfSportsPress(): void
    {
        $this->assertInstanceOf(SportsPress::class, sportspress());
    }

    /**
     * @dataProvider resourceNameClassProvider
     */
    public function testInstantiatesCorrectResourceClassMethodAccess($name, $class): void
    {
        $this->assertInstanceOf($class, $this->sportspress->$name());
    }

    /**
     * @dataProvider resourceNameClassProvider
     */
    public function testInstantiatesCorrectResourceClassPropertyAccess($name, $class): void
    {
        $this->assertInstanceOf($class, $this->sportspress->$name);
    }

    /**
     * @dataProvider resourceNameClassProvider
     */
    public function testInstantiatedResourceInstanceOfResourceMethodAccess($name): void
    {
        $this->assertInstanceOf(Resource::class, $this->sportspress->$name());
    }

    /**
     * @dataProvider resourceNameClassProvider
     */
    public function testInstantiatedResourceInstanceOfResourcePropertyAccess($name): void
    {
        $this->assertInstanceOf(Resource::class, $this->sportspress->$name);
    }

    /**
     * @dataProvider resourceNameClassProvider
     */
    public function testInstantiatesNewResourceClassMethodAccess($name): void
    {
        $this->assertNotSame($this->sportspress->$name(), $this->sportspress->$name());
    }

    /**
     * @dataProvider resourceNameClassProvider
     */
    public function testInstantiatesNewResourceClassPropertyAccess($name): void
    {
        $this->assertNotSame($this->sportspress->$name, $this->sportspress->$name);
    }

    public function testIncorrectResourceNameThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->sportspress->unknown();
    }

    /**
     * @dataProvider resourceNameClassProvider
     */
    public function testResourceGetCallsCorrectEndpoint($name): void
    {
        Http::fake();

        $this->sportspress->$name->get();

        Http::assertSent(function (Request $request) use ($name) {
            return $request->url() === "https://example.com/wp-json/sportspress/v2/$name";
        });
    }

    /**
     * @dataProvider resourceNameClassProvider
     */
    public function testResourceFindCallsCorrectEndpoint($name): void
    {
        Http::fake();

        $id = rand(1, 1000);

        $this->sportspress->$name->find($id);

        Http::assertSent(function (Request $request) use ($name, $id) {
            return $request->url() === "https://example.com/wp-json/sportspress/v2/$name/$id";
        });
    }

    public function resourceNameClassProvider(): array
    {
        return [
            ['calendars', Calendars::class, ],
            ['events', Events::class, ],
            ['leagues', Leagues::class, ],
            ['players', Players::class, ],
            ['roles', Roles::class, ],
            ['seasons', Seasons::class, ],
            ['staff', Staff::class, ],
            ['teams', Teams::class, ],
            ['venues', Venues::class, ],
        ];
    }
}
