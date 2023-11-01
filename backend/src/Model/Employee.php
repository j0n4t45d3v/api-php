<?php
namespace Desafio\Model;

class Employee {
  private string $name;
  private string $lastname;
  private string $birthdate;
  private float $salary;
  private int $office;

	function __construct(string $name, string $lastname, string $birthdate, float $salary, int $office) {
		$this->name = $name;
		$this->lastname = $lastname;
		$this->birthdate = $birthdate;
		$this->salary = $salary;
		$this->office = $office;
	}

	public function getName(): string {
		return $this->name;
	}
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}

	public function getLastname(): string {
		return $this->lastname;
	}

	public function setLastname(string $lastname): self {
		$this->lastname = $lastname;
		return $this;
	}

	public function getBirthdate(): string {
		return $this->birthdate;
	}

	public function setBirthdate(string $birthdate): self {
		$this->birthdate = $birthdate;
		return $this;
	}

	public function getSalary(): float {
		return $this->salary;
	}

	public function setSalary(float $salary): self {
		$this->salary = $salary;
		return $this;
	}

	public function getOffice(): int {
		return $this->office;
	}

	public function setOffice(int $office): void {
		$this->office = $office;

	}
}
