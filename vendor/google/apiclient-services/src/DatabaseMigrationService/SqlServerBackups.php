<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\DatabaseMigrationService;

class SqlServerBackups extends \Google\Model
{
  /**
   * @var string
   */
  public $gcsBucket;
  /**
   * @var string
   */
  public $gcsPrefix;

  /**
   * @param string
   */
  public function setGcsBucket($gcsBucket)
  {
    $this->gcsBucket = $gcsBucket;
  }
  /**
   * @return string
   */
  public function getGcsBucket()
  {
    return $this->gcsBucket;
  }
  /**
   * @param string
   */
  public function setGcsPrefix($gcsPrefix)
  {
    $this->gcsPrefix = $gcsPrefix;
  }
  /**
   * @return string
   */
  public function getGcsPrefix()
  {
    return $this->gcsPrefix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SqlServerBackups::class, 'Google_Service_DatabaseMigrationService_SqlServerBackups');