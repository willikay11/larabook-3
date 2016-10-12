<?php 
$I = new FunctionalTester($scenario);

$I->am('a larabook member');
$I->wantTo('login to my Larabook account');

$I->signIn();

$I->seeInCurrentUrl('statuses');
$I->see('Post a Status');

//$I->assertTrue(Auth::check());
