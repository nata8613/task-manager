import React from 'react';
import { StyleSheet, View, Switch, Text } from 'react-native';
import { useField } from 'formik';
import PropTypes from 'prop-types';

import theme from '../../constants/theme';

function SwitchField({ name, label, ...props }) {
  const [field, , helpers] = useField(name);
  return (
    <View style={styles.container}>
      <Switch
        value={field.value}
        onValueChange={(value) => helpers.setValue(value)}
        trackColor={{
          false: theme.colors.darkGray,
          true: theme.colors.primary,
        }}
        thumbColor={field.value ? theme.colors.secondary : theme.colors.white}
        ios_backgroundColor={theme.colors.darkGray}
        // eslint-disable-next-line react/jsx-props-no-spreading
        {...props}
      />
      <Text style={styles.label}>{label}</Text>
    </View>
  );
}

export { SwitchField };

const styles = StyleSheet.create({
  container: {
    flex: 1,
    flexDirection: 'row',
    alignItems: 'center',
    marginVertical: theme.spacing.small,
  },
  label: {
    marginLeft: theme.spacing.large,
  },
});

SwitchField.propTypes = {
  name: PropTypes.string.isRequired,
  label: PropTypes.string.isRequired,
};
