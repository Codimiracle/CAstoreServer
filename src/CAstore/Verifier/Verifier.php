<?php
/**
 * Created by PhpStorm.
 * User: codimiracle
 * Date: 18-2-2
 * Time: 下午3:55
 */

namespace CAstore\Verifier;


interface Verifier
{
    const RESULT_OK = 0x00;
    const RESULT_EMPTY = 0x10;
    const RESULT_UNRECOGNIZED = 0x20;

    public function verifyAll();
    public function verify($field);

    public function isValidity();

    public function getValidationCode($field);

    public function getValidationMessage($field);

    public function getResultCode();
    public function getResultMessage();
}