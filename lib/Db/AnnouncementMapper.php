<?php

/**
 * Nextcloud - Dashboard App
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author regio iT gesellschaft für informationstechnologie mbh
 * @copyright regio iT 2017
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Dashboard\Db;

use OCP\AppFramework\Db\Mapper;
use OCP\IDBConnection;

/**
 * Description of AnnouncementMapper
 */
class AnnouncementMapper extends Mapper
{
    /**
     * @param IDBConnection $db Instance of the Db abstraction layer
     */
    public function __construct(IDBConnection $db)
    {
        parent::__construct($db, 'dashboard_announcements');
    }

    public function findAll($limit = null, $offset = null)
    {
        $sql = 'SELECT * FROM `*PREFIX*dashboard_announcements` WHERE expiration >= CURDATE() ORDER BY created_at DESC';
        return $this->findEntities($sql, [], $limit, $offset);
    }

    public function findOne($id)
    {
        $sql = 'SELECT * FROM `*PREFIX*dashboard_announcements` WHERE id = ?';
        return $this->findEntity($sql, [$id]);
    }
}