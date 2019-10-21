<?php

class States_StatesManagerModel extends countriesStatesBaseModel
{
	//get all States in specified country
	public function getAllStatesByCountryId($id)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$ro = $this->getContext()->getRouting();
		$sql="
			SELECT 
			        state.stateID, state.stateName, state.code
			FROM 
			        state
		        	WHERE
				state.country_id = :id
			ORDER BY 
			        stateName
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':id', $id);
		$stmt1->execute();
		$list = array();
		while ($rec = $stmt1->fetch(PDO::FETCH_ASSOC))
		{
			$rec['stateUrl'] = $ro->gen('show_state', ['state_id' => $rec['stateID']]);
			$rec['editUrl'] = $ro->gen('edit_state', ['state_id' => $rec['stateID']]);
			$rec['deleteUrl'] = $ro->gen('delete_state', ['state_id' => $rec['stateID']]);
			$list[] = $rec;
		}
		return $list;
	}

	//get the parrent(country) info of specified state
	public function getCountryByStateId($id)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$sql="
			SELECT
				state.country_id, country.countryName, country.countryID
			FROM
				state
			JOIN
				country ON (country.countryID = state.country_id)
			WHERE
				stateID = :id
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':id', $id);
		$stmt1->execute();
		$list = array();
		$rec = $stmt1->fetch(PDO::FETCH_ASSOC);
		if ($rec)
		{
			$list['parrentID'] =$rec['country_id'];
			$list['parrentName'] =$rec['countryName'];
			$list['parrentUrl'] = 'country.php?countryID='.$rec['countryID'];
			return $list;
		}
		
		return false;
	}

	//get the number of cities in cpecified state
	public function getNumberOfCities($id)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$sql="
			SELECT
				COUNT(DISTINCT cityID) AS cityCounter
			FROM
				state
			JOIN
				city ON (state.stateID = city.state_id)
            			WHERE 
            				stateID=:id
			GROUP BY
				stateID;
                
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':id', $id);
		$stmt1->execute();
		$rec = $stmt1->fetch(PDO::FETCH_ASSOC);
		if ($rec)
		{
			return $rec['cityCounter'];
		}
		
		return false;
	}
	//get all info about speciafied State
	public function getStateById($id)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$sql="
			SELECT 
			        state.*
			FROM 
			        state
		        	WHERE
				state.stateID = :id
			ORDER BY 
			        stateName
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':id', $id);
		$stmt1->execute();
		if ($rec = $stmt1->fetch(PDO::FETCH_ASSOC))
		{
			$rec['stateUrl'] = 'state.php?stateID='.$rec['stateID'];
			$rec['editUrl'] = 'state-edit.php?stateID='.$rec['stateID'];
			return $rec;
		}

		return false;
	}

	public function update(array $record)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$sql ="
			UPDATE
				state
			SET 
				stateName = :stateName,
				code = :code,
				country_id = :country_id,
				population = :population,
				area = :area
			WHERE 
				stateID = :stateID
		";
		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':stateName', trim(ucwords($record['stateName'])));
		$stmt1->bindValue(':code', strtoupper($record['code']));
		$stmt1->bindValue(':country_id', $record['country_id']);
		$stmt1->bindValue(':area', $record['area']);
		$stmt1->bindValue(':population', $record['population']);
		$stmt1->bindValue(':stateID', $record['stateID']);
		$stmt1->execute();
	}

	public function insert(array $record)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$sql="
			INSERT INTO
				state
			SET
				country_id = :country_id,
				stateName = :stateName,
				code = :code,
				population = :population,
				area = :area
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':country_id', $record['country_id']);
		$stmt1->bindValue(':stateName', trim(ucwords($record['stateName'])));
		$stmt1->bindValue(':code', strtoupper($record['code']));
		$stmt1->bindValue(':population', $record['population']);
		$stmt1->bindValue(':area', $record['area']);
		$stmt1->execute();

		return $db->lastInsertId();
	}

	public function delete($id)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$sql="
			DELETE  FROM 
			 	state
			WHERE
				stateID = :id
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':id', $id);
		$stmt1->execute();
	}
}

?>