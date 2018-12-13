<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
	public function authenticate()
	{
		//else if(!$user->validatePassword($this->password))
		$username = strtolower($this->username);
		$user = User::model()->find('LOWER(username)=?', array($username));

		if($user===null)
		    $this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!CPasswordHelper::verifyPassword($this->password, $user->password))
		{
		    $this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		else
		{
		    $this->_id = $user->id;
		    $this->username = $user->username;
		    $this->errorCode = self::ERROR_NONE;
		    $user->last_login=date('Y-m-d h:i:s');
		    $user->save();
			
	  	}
	   	return $this->errorCode == self::ERROR_NONE;
	}	


	public function authenticateGuess()
	{
		$this->_id = 'guess';
		$this->username = 'guess';
		$this->errorCode = self::ERROR_NONE;
		return !$this->errorCode;
	}
	
	public function getId()
	{
		return $this->_id;
	}
}