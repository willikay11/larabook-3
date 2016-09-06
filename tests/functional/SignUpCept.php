<?php 
$I = new FunctionalTester($scenario);
$I -> am('a guest');
$I->wantTo('sign up for a larabook account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username','william');
$I->fillField('Email','willikay11@gmail.com');
$I->fillField('Password','kamuyu');
$I->fillField('Password_Confirmation','kamuyu');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to larabook');

$I->seeRecord('users',[
   'username' => 'william',
    'email' => 'willikay11@gmail.com'
]);

$I->assertTrue(Auth::check());