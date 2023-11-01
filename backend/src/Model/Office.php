<?php
namespace Desafio\Model;

class Office {
  private string $description;

	function __construct(string $description) {
		$this->description = $description;
	}

	public function getDescription(): string {
		return $this->description;
	}

	public function setDescription(string $description): self {
		$this->description = $description;
		return $this;
	}
}
