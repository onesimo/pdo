<?php 

class ServiceProduct
{
	private $db;
	private $product;

	public function __construct(Iconn $db, IProduct $product)
	{
		$this->db = $db->connect();
		$this->product = $product;
	}

	public function list()
	{
		$query = "select * from `products` ";
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}
	public function find($id)
	{
		$query = "select * from `products` where id = :id ";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(":id", $id);
		
		$stmt->execute();
		return $stmt->fetch(\PDO::FETCH_ASSOC);

	}

	public function save()
	{
		$query = "insert into `products` (`name`, `desc`) values (:name,:desc)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(":name",$this->product->getname());
		$stmt->bindValue(":desc",$this->product->getDesc());

		$stmt->execute();
		return $this->db->lastInsertId();
		
	}

	public function update($id)
	{
		$query = "update `products` set `name`=?, `desc`=? where `id`=?";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1,$this->product->getname());
		$stmt->bindValue(2,$this->product->getDesc());
		$stmt->bindValue(3,$this->product->getId());

		//print_r($this->product->getId());
		$res = $stmt->execute();

		print_r($stmt);
		return $res;
		
	}

	public function delete(int $id)
	{
		
		$query = "delete from `products` where `id`=:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(":id",$id);

		$res = $stmt->execute();
		return $res;
	}
}