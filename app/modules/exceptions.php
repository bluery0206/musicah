<?php



class FieldException extends Exception 
{
    private string $field;

    public function __construct(string|null $field, string $message, int $code=0, Exception $previous=null) 
    {
        parent::__construct($message, $code, $previous);

        $this->field = $field; 
    }

    public function getField(): string|null 
    {
        return $this->field;
    }
}



class EmptyFieldException extends FieldException 
{
    public function __construct(string|null $field, string $message, int $code=0, Exception $previous=null) 
    {
        parent::__construct($field, $message, $code, $previous);
    }
}



class DataAlreadyExistsException extends FieldException 
{
    public function __construct(string|null $field, string $message, int $code=0, Exception $previous=null) 
    {
        parent::__construct($field, $message, $code, $previous);
    }
}

