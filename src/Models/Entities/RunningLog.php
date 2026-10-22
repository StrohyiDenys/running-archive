<?php

namespace App\Models\Entities;

class RunningLog
{

    public function __construct(
        private int $id,
        private int $user_id,
        private ?float $distance = null, //time and distance can be null due to the fact
        private ?int $time = null,       //that user can log only time or distance
        private string $date,
        private ?string $notes = null
    ){}

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
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

//todo something
//id, user_id, distance, time, date, notes, created_at, updated_at
//id, name, password, secret, created_at, updated_at
}