<?php 
    namespace App\Repo;
    class Repo 
    {
        protected $model; 
        public function __construct($model)
        {
            $this->model=$model;
        }
        
        public function filter($filters,$data)
        {
            foreach ($filters as $filter)
            {
                if (isset( $data[$filter])) $this->model=$this->model->where($filter,$data[$filter]);
            }
        }

        public function last($data)
        {
            if (isset($data["last"]))
            {
                $this->model=$this->model->orderBy("id","desc")->take(1);
            }
        }

        public function orderData($data)
        {
            if (isset($data["sort"]))
            {
                $this->model=$this->model->orderBy("created_at",$data["sort"]);
            }
        }

        public function dateFilter($data)
        {
            if (isset($data["start_date"]) && isset($data["end_date"]))
            {
                $this->model=$this->model->whereHas("day",function($query) use($data) {
                    $query->whereBetween("date",[$data["start_date"],$data["end_date"]]);
                });
            }
        }

 

     

    }

?>