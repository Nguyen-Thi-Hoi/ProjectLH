<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FirstCest
{
    //Case 1//
    public function loginSuccess(AcceptanceTester $I)
    {
        $I->amOnPage('');
        $I->see('Đăng nhập');
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-required")]'], 'sale1');
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-password-input")]'], 'Sale@1234');
        $I->click(['xpath' => '//button[contains(@class,"btn-primary")]']);
        $I->waitForElement(['xpath' => '//a[@class="MuiTypography-root MuiTypography-inherit MuiLink-root MuiLink-underlineHover css-1ulb9y3"]'], 8);
        $I->see('Trang chủ', '//a[@class="MuiTypography-root MuiTypography-inherit MuiLink-root MuiLink-underlineHover css-1ulb9y3"]');
        $I->wait(12);
    }
    //case 2//
    public function loginWithEmptyUsername(AcceptanceTester $I)
    {
        $I->amOnPage('');
        $I->see('Đăng nhập');
        $I->wait(2);
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-required")]'], '');
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-password-input")]'], 'Sale@1234');
        $I->click(['xpath' => '//button[contains(@class,"btn-primary")]']);
        $I->waitForElement(['xpath' => '//p[@id="outlined-error-helper-text-helper-text"]'], 3);
        $I->see('Vui lòng nhập tên đăng nhập.', ['xpath' => '//p[@id="outlined-error-helper-text-helper-text"]']);
        $I->wait(10);
    }

    //case 3//
    public function loginWithEmptyPassword(AcceptanceTester $I)
    {
        $I->amOnPage('');
        $I->see('Đăng nhập');
        $I->wait(2);
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-required")]'], 'sale1');
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-password-input")]'], '');
        $I->click(['xpath' => '//button[contains(@class,"btn-primary")]']);
        $I->waitForElement(['xpath' => '//input[@type="password"]/parent::div/following-sibling::p'], 5);
        $I->see('Vui lòng nhập mật khẩu.', ['xpath' => '//input[@type="password"]/parent::div/following-sibling::p']);
        $I->wait(10);
    }
     //case 4//
    public function loginWithInvalidUsername(AcceptanceTester $I)
    {
        $I->amOnPage('');
        $I->see('Đăng nhập');
        $I->wait(2);
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-required")]'], 'sale12');
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-password-input")]'], 'Sale@1234');
        $I->click(['xpath' => '//button[contains(@class,"btn-primary")]']);
        $I->waitForElement(['xpath' => '//p[@id="outlined-error-helper-text-helper-text"]'], 3);
        $I->see('Tên đăng nhập không chính xác.', ['xpath' => '//p[@id="outlined-error-helper-text-helper-text"]']);
        $I->wait(10);
    }

    //case 5//
    public function loginWithInvalidPassword(AcceptanceTester $I)
    {
        $I->amOnPage('');
        $I->see('Đăng nhập');
        $I->wait(2);
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-required")]'], 'sale1');
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-password-input")]'], 'Sale');
        $I->click(['xpath' => '//button[contains(@class,"btn-primary")]']);
        $I->waitForElement(['xpath' => '//input[@type="password"]/parent::div/following-sibling::p'], 5);
        $I->see('Mật khẩu không chính xác.', ['xpath' => '//input[@type="password"]/parent::div/following-sibling::p']);
        $I->wait(5);
    }

    /* //case 6//
    public function loginWithInvalidUsernameAndPassword(AcceptanceTester $I)
    {
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-required")]'], 'dataInvalid');
        $I->fillField(['xpath' => '//input[contains(@id, "outlined-password-input")]'], 'Sale');
        $I->click(['xpath' => '//button[contains(@class,"btn-primary")]']);
        $I->waitForElement(['xpath' => '//p[@id="outlined-error-helper-text-helper-text"]'], 3);
        $I->see('Vui lòng nhập tên đăng nhập.', ['xpath' => '//p[@id="outlined-error-helper-text-helper-text"]']);
        $I->wait(3);
    } */
}
