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

	/**
	 * sends a 200 response
	 * @param  array $data    the data
	 * @param  array  $headers any headers
	 * @return mixed
	 */
	public function respondOk($data, $message = "Ok", $headers = [])
	{
		$data['status'] = [
				'code' => $this->getStatusCode(),
				'message' => $message
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
		return $this->setStatusCode(404)->respondWithError($message);
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

	/**
	 * returns a response with error and status code 400
	 * @param  string $message the bad request message
	 * @return mixed
	 */
	public function respondBadRequest($message = "Bad Request.")
	{
		return $this->setStatusCode(400)->respondWithError($message);
	}

	/**
	 * returns a 201 created response
	 * @param  array $data    the data to be returned
	 * @param  string $message the message with the response
	 * @param  array  $headers any headers
	 * @return mixed
	 */
	public function respondCreated($data, $message = "Created.", $headers = [])
	{
		return $this->setStatusCode(201)->respondOk($data, $message, $headers);
	}

    /**
     * returns the paginator data
     * @param  array $items simplePaginator to Array
     * @return array        the paginator data
     */
    public function paginator($items)
    {
        return [
            'current_page' => $items['current_page'],
            'prev' => $items['prev_page_url'],
            'next' => $items['next_page_url']
        ];
    }

}
