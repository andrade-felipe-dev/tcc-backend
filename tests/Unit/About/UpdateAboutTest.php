<?php

namespace Tests\Unit\About;

use App\Models\About;
use App\UseCases\About\AboutDTO;
use App\UseCases\About\UpdateAbout;
use PHPUnit\Framework\TestCase;

class UpdateAboutTest extends TestCase
{
    public function test_should_be_execute_use_case(): void
    {
        $aboutMock = $this->createMock(About::class);
        $data = new AboutDTO();
        $data->description =  'Nova descrição';

        $aboutMock->expects($this->once())
            ->method('update')
            ->with([
                'description' => $data->description
            ]);

        $useCase = new UpdateAbout();
        $result = $useCase->execute($aboutMock, $data);

        $this->assertSame($aboutMock, $result);
    }
}
