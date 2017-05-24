<?php 

namespace App\Http\Controllers;

class ApiController extends Controller
{
	protected $statusCode = 200;

	/**
	 * statuscode getter
	 * @return int
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 * sets the statusCode
	 * @param int $statusCode
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;
		return $this;
	}

	/**
	 * the generic response method
	 * @param  mixed $data    the data to be displayed
	 * @param  array  $headers any headers to respond with
	 * @return mixed
	 */
	public function respond($data, $headers = [])
	{
		return response($data, $this->getStatusCode(), $headers);
	}

	public function respondOk($data, $headers = [])
	{
		$data['status'] = [
				'code' => $this->getStatusCode(),
				'message' => 'Ok'
			];
		return response($data, $this->getStatusCode(), $headers);
	}

	/**
	 * returns an error
	 * @param  string $message the error message
	 * @return mixed
	 */
	public function respondWithError($message)
	{
		return $this->respond([
			'error' => [
		 		'status_code' => $this->getStatusCode(),
		 		'message' => $message
			]
		]);
	}

	/**
	 * returns a response with error and status code 404
	 * @param  string $message the not found error message
	 * @return mixed
	 */
	public function respondNotFound($message = "Not Found.")
	{
		return $this
				->setStatusCode(404)
				->respondWithError($message);
	}

	/**
	 * returns a response with error and status code 500
	 * @param  string $message the internal error message
	 * @return mixed
	 */
	public function respondInternalError($message = "Internal Error.")
	{
		return $this->setStatusCode(500)->respondWithError($message);
	}
}
