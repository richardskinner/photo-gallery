<?php

namespace Tests\Unit;

use App\Mail\ImageUploadStoredEmail;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class ImageUploadStoredEmailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_mailable_content_correct()
    {
        $user = new User(['name' => 'Joe Bloggs', 'email' => 'test@test.com']);

        $mailable = new ImageUploadStoredEmail($user);

        $mailable->assertFrom('stored@photo-gallery.com');
        $mailable->assertHasSubject('Image Upload Stored Email');
    }
}
