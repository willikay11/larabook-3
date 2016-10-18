<?php
$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('I want to view my profile');

$I->signIn();

$I->amOnPage('statuses');

$I->postAStatus('My new status!');

$I->click('My Profile');

$I->seeCurrentUrlEquals('/@Foobar');

$I->see('My new status!');