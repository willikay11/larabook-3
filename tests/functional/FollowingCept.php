<?php 
$I = new FunctionalTester($scenario);

$I->am('a Larabook user');
$I->wantTo('to follow other larabook users');

$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();

$I->click('Browse Users');
$I->click('OtherUser');

$I->seeCurrentUrlEquals('/@OtherUser');
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

$I->see('Unfollow OtherUser');
$I->dontSee('Follow OtherUser');

$I->click('Unfollow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

$I->see('Follow OtherUser');