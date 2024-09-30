# Objective 1
Clone the repository
```
git clone repo-link
```

Install dependencies:
```
composer install
npm install
```
Create `.env` file from `.env-sample` and run:
```
php artisan key:generate
```
Go to `.env` file and update those line with created database.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book
DB_USERNAME=root
DB_PASSWORD=
```
Run the application by:
```
php artisan serve
```

# Objective 2
Create model, migration, seeder:
```
php artisan make:model <ModelName> -mcrfs
```
You can separately created them:
```
php artisan make:model ModelName -m
php artisan make:seeder ModelSeeder
php artisan make:factory ModelFactory
```
Go to migration file and update as follows:
```
 public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("name", length: 255)->nullable(false);
            $table->string("designation", length: 100)->nullable(false);
            $table->date("joining_date")->nullable(false);
            $table->float("salary")->nullable(false);
            $table->string("email")->nullable(true);
            $table->string("mobile_no")->nullable(false);
            $table->text("address");
            $table->timestamps();
        });
    }
```

Run migration as:
```
php artisan migrate
```

Go to factory class and update as follows:
```
public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'designation' => $this->faker->jobTitle(),
            'joining_date' => $this->faker->date(),
            'salary' => $this->faker->randomFloat(2, 30000, 100000),
            'email' => $this->faker->unique()->safeEmail(),
            'mobile_no' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
```

Then go to seeder class and update as:
```
use App\Models\Employee;
public function run(): void
    {
        Employee::factory()->count(200)->create();
    }
```
To run seeder :
```
php artisan db:seed --class=<seeder_name>
```

# Objective 3

## Create
```
public function createEmployee(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'designation'=>'required',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric|min:2000|max:20000',
            'email' => 'required|email|unique:employees',
            'mobile_no' => 'required|regex:/(01)[0-9]{9}/'
        ]);
        $employee = new Employee();

        $employee->name = $req->name;
        $employee->designation = $req->designation;
        $employee->joining_date = $req->joining_date;
        $employee->salary = $req->salary;
        $employee->email = $req->email;
        $employee->mobile_no = $req->mobile_no;
        $employee->address = $req->address;

        $employee->save();

        return redirect("/view-all");
    }
```
## Update
```
public function update(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'designation'=>'required',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric|min:2000|max:20000',
            'email' => 'required|email|unique:employees',
            'mobile_no' => 'required|regex:/(01)[0-9]{9}/'
        ]);
        
        $employee = Employee::find($req->id);

        $employee->name = $req->name;
        $employee->designation = $req->designation;
        $employee->joining_date = $req->joining_date;
        $employee->salary = $req->salary;
        $employee->email = $req->email;
        $employee->mobile_no = $req->mobile_no;
        $employee->address = $req->address;

        $employee->save();
        return redirect("/view-all");

    }
```

## Delete
```
public function deleteById($id)
    {
        $employee = Employee::find($id);
        if($employee)
        {
            $employee->delete();
        }
        return redirect("/view-all");
    }
```

## Search
```
public function search(Request $req)
    {
        if($req->text=="") return redirect("/view-all");
        $text = $req->text;
        $employees = Employee::where("name",'LIKE','%'.$text.'%')->orWhere("designation", 'LIKE', '%'.$text.'%')->get();
        return view('search', ['employees'=>$employees]);
    }
```

## Pagination
To paginate use 

```
$employees = Employee::paginate(15);
```

Then update view as:
```
<div class="row">
  <!-- <div class="col-auto"> -->
    {{ $employees->links('vendor.pagination.bootstrap-5') }}
  <!-- </div> -->
</div>
```
You must publish your vendor as:
```
php artisan vendor:publish --tag=laravel-pagination
```