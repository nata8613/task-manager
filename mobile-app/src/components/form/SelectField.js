import { View, Text } from 'react-native';
import { Picker } from '@react-native-picker/picker';
import PropTypes from 'prop-types';
import { useField } from 'formik';

import globalStyles from '../../styles/common';

function SelectField({ items, label, name }) {
  const [field, , helpers] = useField(name);

  return (
    <View>
      <Text style={globalStyles.label}>{label}</Text>
      <Picker
        selectedValue={field.value}
        onValueChange={(itemValue, itemIndex) => helpers.setValue(itemValue)}
        itemStyle={{ fontSize: 14, height: 130 }}
      >
        {items.map((item, index) => (
          <Picker.Item key={item.id} label={item.label} value={item.id} />
        ))}
      </Picker>
    </View>
  );
}

export { SelectField };

SelectField.propTypes = {
  items: PropTypes.arrayOf(
    PropTypes.shape({
      id: PropTypes.oneOfType([PropTypes.string, PropTypes.number]).isRequired,
    }),
  ),
  label: PropTypes.string,
  name: PropTypes.string.isRequired,
};

SelectField.defaultProps = {
  items: null,
  label: '',
};
