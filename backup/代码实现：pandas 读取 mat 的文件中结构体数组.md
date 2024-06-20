# 引入 python 库

```python
import scipy.io
import numpy as np
import pandas as pd
```

# 函数实现

假设 mat 文件中有一个结构体数组的数据名为 `data`

```python

def create_pd(matValue):
    # 初始化一个字典来存储数据
    data_dict = {}
    
    # 提取所有字段名
    field_names = matValue.dtype.names
    
    # 初始化字典的键
    for field in field_names:
        data_dict[field] = []
    
    # 解析结构体数组并提取数据
    for i in range(matValue.shape[0]):
        # 获取第 i 个结构体
        struct = matValue[i, 0]
        
        # 提取每个字段的值
        for field in field_names:
            value = struct[field]
            # 如果值是数组，展开它
            if isinstance(value, np.ndarray) and value.size == 1:
                value = value[0, 0] if value.shape[0] == 1 else value.flatten()
            
            data_dict[field].append(value)
    
    # 将字典转换为 DataFrame
    df = pd.DataFrame(data_dict)
    
    # 显示 DataFrame
    return df

def load_struct_mat(mat_file , valueKey = "data"):
    mat = scipy.io.loadmat(mat_file + ".mat")
    list = create_pd(mat[valueKey])
    return list
```

# 使用方法

```python
df = load_struct_mat("data.mat", "data")
# df 的类型就是 pandas.DataFrame
df.to_csv("data.csv", index = False)
```