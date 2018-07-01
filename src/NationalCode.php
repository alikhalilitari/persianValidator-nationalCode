<?php


namespace PersianValidator\NationalCode;


use Exception;

class NationalCode
{
    protected $code;
    protected $invalidNationalCodes = [
        '0000000000',   '1111111111',   '2222222222',   '3333333333',
        '4444444444',   '5555555555',   '6666666666',   '7777777777',
        '8888888888',   '9999999999',   '00000000000',  '11111111111',
        '22222222222',  '33333333333',  '44444444444',  '55555555555',
        '66666666666',  '77777777777',  '88888888888',  '99999999999'
    ];


    public function __construct($code)
    {
        $this->code = $code;
    }


    public function validate()
    {
        preg_match_all('/\d+/', $this->code, $matches);

        if (isset($matches[0][0])) {
            $this->code = $matches[0][0];
        } else {
            throw new Exception($this->message());
        }

        if (collect($this->invalidNationalCodes)->contains($this->code)) {
            throw new Exception($this->message());
        }

        $length = strlen($this->code);

        if ($length != 10 && $length != 11) {
            throw new Exception($this->message());
        }

        if ($length == 10) {
            $c = (int)(substr($this->code, 9, 1));
            $n = (int)(substr($this->code, 0, 1)) * 10 +
                (int)(substr($this->code, 1, 1)) * 9 +
                (int)(substr($this->code, 2, 1)) * 8 +
                (int)(substr($this->code, 3, 1)) * 7 +
                (int)(substr($this->code, 4, 1)) * 6 +
                (int)(substr($this->code, 5, 1)) * 5 +
                (int)(substr($this->code, 6, 1)) * 4 +
                (int)(substr($this->code, 7, 1)) * 3 +
                (int)(substr($this->code, 8, 1)) * 2;
            $r = $n - (int)($n / 11) * 11;

            if (!(($r == 0 && $r == $c) || ($r == 1 && $c == 1) || ($r > 1 && $c == 11 - $r))) {
                throw new Exception($this->message());
            }
        }
    }

    public function isValid()
    {
        try {
            $this->validate();
        } catch (Exception $exception) {
            return false;
        }
        return true;
    }

    public function notValid()
    {
        return !$this->isValid();
    }


    public function message()
    {
        return 'Invalid National Code';
    }

    public static function make($code)
    {
        return new static($code);
    }

    public function __toString()
    {
        return $this->code;
    }
}