<?php

class Countries_CountriesManagerModel extends countriesBaseModel
{
	public function getAll()
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$ro = $this->getContext()->getRouting();

		$sql="
			SELECT 
				country.countryID, country.countryName
			FROM
				country
			ORDER BY
				countryName
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->execute();
		$list = array();
		while ($rec = $stmt1->fetch(PDO::FETCH_ASSOC))
		{
			$rec['countryUrl'] = $ro->gen('show_country', ['country_id' => $rec['countryID']]);
			$rec['editUrl'] = $ro->gen('edit_country', ['country_id' => $rec['countryID']]);
			$rec['deleteUrl'] = $ro->gen('delete_country', ['country_id' => $rec['countryID']]);
			$list[] = $rec;
		}

		return $list;
	}

	public function getById($id)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$ro = $this->getContext()->getRouting();

		$sql="
			SELECT 
			        country.*
			FROM 
			        country
			WHERE
				countryID = :id
			ORDER BY 
			        countryName
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':id', $id);
		$stmt1->execute();
		if ($rec = $stmt1->fetch(PDO::FETCH_ASSOC))
		{
			$rec['countryUrl'] = $ro->gen('show_country', ['country_id' => $rec['countryID']]);
			$rec['editUrl'] = $ro->gen('edit_country', ['country_id' => $rec['countryID']]);
			return $rec;
		}

		return false;
	}

	//get the number of states in cpecified country
	public function getNumberOfStates($id)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$sql="
			SELECT
				COUNT(DISTINCT stateID) AS stateCounter
			FROM
				country
			JOIN
				state ON (country.countryID = state.country_id)
            			WHERE 
            				countryID=:id
			GROUP BY
				countryID
                
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':id', $id);
		$stmt1->execute();
		$rec = $stmt1->fetch(PDO::FETCH_ASSOC);
		if ($rec)
		{
			return $rec['stateCounter'];
		}
		
		return false;
	}
	public function insert(array $record)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$sql="
			INSERT INTO
				country
			SET
				countryName = :countryName,
				code = :code,
				population = :population,
				area = :area
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':countryName', trim(ucwords($record['countryName'])));
		$stmt1->bindValue(':code', strtoupper($record['code']));
		$stmt1->bindValue(':population', $record['population']);
		$stmt1->bindValue(':area', $record['area']);
		$stmt1->execute();

		return $db->lastInsertId();
	}

	public function update(array $record)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$sql="
			UPDATE
				country
			SET
				countryName = :countryName,
				code = :code,
				population = :population,
				area = :area
			WHERE
				countryID = :countryID
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':countryName', trim(ucwords($record['countryName'])));
		$stmt1->bindValue(':code', $record['code']);
		$stmt1->bindValue(':population', $record['population']);
		$stmt1->bindValue(':area', $record['area']);
		$stmt1->bindValue(':countryID', $record['countryID']);
		$stmt1->execute();
	}

	public function delete($id)
	{
		$db = $this->getContext()->getDatabaseManager()->getDatabase()->getConnection();
		$sql="
			DELETE  FROM 
			 	country
			WHERE
				countryID = :id
		";

		$stmt1 = $db->prepare($sql);
		$stmt1->bindValue(':id', $id);
		$stmt1->execute();
	}
}

?>