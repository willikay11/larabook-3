<?php 
$I = new FunctionalTester($scenario);

$I->am('a larabook member');
$I->wantTo('login to my Larabook account');

$I->signIn();

$I->seeInCurrentUrl('statuses');
$I->see('Welcome back!');

//$I->assertTrue(Auth::check());
