# phpbench/phpbench 官網
https://phpbench.readthedocs.io/en/latest/index.html


# 測試方式
./vendor/bin/phpbench run tests/{bench} --report=(default | aggregate)
	--iterations=10						// 樣本數
	--revs=1000							// 連續執行的次數
	--progress={progress}				// [none: 不顯示過程，只顯示結果, verbose: 詳細 (預設), ...]
	--retry-threshold=5					// 百分比誤差幅度，越低越穩定 (超過誤差值會 retry)
## 指定資料夾
./vendor/bin/phpbench run tests/Benchmark
## 指定檔案
./vendor/bin/phpbench run tests/Benchmark/DemoBench.php
	--filter="benchConsume"				// 指定 method (TODO: 似乎也可包含 class)
	--filter="DemoBench::benchConsume"	// 指定 class & method
	--filter="DemoBench::*"				// 指定 class (支援 regex)


# Report 欄位說明 (參考: https://phpbench.readthedocs.io/en/latest/annotributes.html)
iter (Iterations) : 樣本數，完美情況下每一個樣本的結果應相同 (預設: 1 個)
revs (Revolutions) : 單次測量中連續執行的次數 (預設: 1 次)
rstdev (relative standard deviation) : 相對標準偏差，最低測量值的百分比差異 (樣本數 > 1 時)，0% 為完美，超過 2% 為可疑 (--report=aggregate)


# 測試程式
./tests/Benchmark/{MyTestBench.php} {
	// Class name must have the "Bench" suffix
	class MyTestBench
	{
		// Each benchmark method must be prefixed with "bench"
		public function benchMyTest()
		{
		}
	}
}
