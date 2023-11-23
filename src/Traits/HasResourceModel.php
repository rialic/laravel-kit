<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

trait HasResourceModel
{
  public function __construct(array $attributes = [])
  {
    parent::__construct($attributes);
    array_unshift($this->appends, 'id', 'uuid');
  }

  public function uniqueIds()
  {
    return [str_replace('_id', '_uuid', $this->getKeyName())];
  }

  public function syncFields(array $fields): array
  {
    return collect($fields)->reduce(fn($acc, $field, $key) => $acc += ["{$this->getTableColumnPrefix()}_{$key}" => $field], []);
  }

  public function __get($field)
  {
    $propertyExits = (in_array($field, $this->appends) || in_array($field, $this->fillable));
    $isRelationField = in_array($field, $this->getRelationships()) || str_ends_with($field, '_id');

    if ($propertyExits && !$isRelationField) {
      $method = 'get' . Str::studly($field) . 'Attribute';

      if (method_exists($this, $method)) {
        return $this->{$method}();
      }

      return (array_key_exists($field, $this->getAttributes())) ? $this->getAttributes()[$field] : $this->{$this->getTableColumnPrefix() . '_' . $field};
    }

    return parent::getAttribute($field);
  }

  public function getIdAttribute()
  {
    return $this->getAttributes()[$this->getPrimaryKey()];
  }

  public function getUuidAttribute()
  {
    return $this->getAttributes()["{$this->getTableColumnPrefix()}_uuid"];
  }

  public function getTableColumnPrefix()
  {
    return $this->tableColumnPrefix;
  }

  public function getPrimaryKey()
  {
    return $this->primaryKey;
  }

  public function getRelationships()
  {
    return $this->relationships ?: [];
  }

  public function getDateFormatted($value)
  {
    return date('d/m/Y', strtotime($value));
  }

  public function getDateTimeFormatted($value)
  {
    return date('d/m/Y H:i:s', strtotime($value));
  }
}
