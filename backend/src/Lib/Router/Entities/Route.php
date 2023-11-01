<?php
namespace Desafio\Lib\Router\Entities;

class Route {
  private string $route;
  private string $method;
  private $handler;

  function __construct(string $route, string $method, $handler) {
    $this->route = $route;
    $this->method = $method;
    $this->handler = $handler;
  }

	public function getRoute() : string {
		return $this->route;
	}

	public function setRoute($route): void {
		$this->route = $route;
	}

	public function getMethod() : string {
		return $this->method;
	}

	public function setMethod(string $method): void {
		$this->method = $method;
	}

	public function getHandler() {
		try{
			return call_user_func($this->handler);
		}catch(\Exception $e){
			echo $e->getMessage();
		}
	}

	public function setHandler($handler): void{
		if(is_callable($handler)){
			$this->handler = $handler;
		}else{
			throw new \Exception("Callback inválido");
		}
	}
}

