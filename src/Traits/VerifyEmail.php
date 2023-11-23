<?php

namespace App\Traits;

use App\Jobs\UserVerifyEmailJob;

trait VerifyEmail
{
  public function hasVerifiedEmail()
  {
    return !is_null($this->verified_at);
  }

  public function markEmailAsVerified()
  {
    return $this->forceFill([
      'us_verified_at' => $this->freshTimestamp(),
    ])->save();
  }

  public function sendEmailVerificationNotification()
  {
    UserVerifyEmailJob::dispatch($this)->onQueue('verify-email');
  }
}
