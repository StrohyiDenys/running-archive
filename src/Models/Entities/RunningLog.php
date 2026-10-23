<?php

namespace App\Models\Entities;

class RunningLog implements \JsonSerializable
{
    public function __construct(
        private int $id,
        private ?int $user_id, // don't forget to remove the nullable ? operator (added for debug)
        private ?float $distance, //time and distance can be null due to the fact
        private ?int $time,       //that user can log only time or distance
        private string $date,
        private ?string $notes,
        private ?string $created_at,
        private ?string $updated_at
    ){}

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): ?int //not forget to remove ?
    {
        return $this->user_id;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(?float $distance): void
    {
        $this->distance = $distance;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(?int $time): void
    {
        $this->time = $time;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }
    public function JsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'distance' => $this->getDistance(),
            'time' => $this->getTime(),
            'date' => $this->getDate(),
            'notes' => $this->getNotes(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt()
        ];
    }
    //DB tables:
//id, user_id, distance, time, date, notes, created_at, updated_at
//id, name, password, secret, created_at, updated_at
}