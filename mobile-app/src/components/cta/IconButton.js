import { Pressable, StyleSheet, View, Text } from 'react-native';
import { Ionicons } from '@expo/vector-icons';
import PropTypes from 'prop-types';

import theme from '../../constants/theme';

function IconButton({ text, icon, size, color, onPress }) {
  return (
    <Pressable
      onPress={onPress}
      style={({ pressed }) => [styles.button, pressed && styles.pressed]}
    >
      <View style={styles.buttonContainer}>
        <Text style={styles.buttonText}>{text}</Text>
        <Ionicons name={icon} size={size} color={color} />
      </View>
    </Pressable>
  );
}

export { IconButton };

const styles = StyleSheet.create({
  button: {
    borderRadius: theme.borderRadius,
    width: '100%',
    paddingVertical: 6,
    paddingHorizontal: 12,
    backgroundColor: theme.colors.primary,
    elevation: 2,
    shadowColor: 'black',
    shadowOffset: { width: 1, height: 1 },
    shadowOpacity: 0.25,
    shadowRadius: 4,
  },
  buttonContainer: {
    display: 'flex',
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
  },
  buttonText: {
    color: theme.colors.white,
    fontWeight: theme.typography.fontWeight.bold,
    fontSize: theme.typography.fontSize.regular,
    textTransform: 'uppercase',
  },
  pressed: {
    opacity: 0.75,
  },
});

IconButton.propTypes = {
  text: PropTypes.string.isRequired,
  icon: PropTypes.string,
  size: PropTypes.number,
  color: PropTypes.string,
  onPress: PropTypes.func,
};

IconButton.defaultProps = {
  icon: 'chevron-forward-outline',
  size: 24,
  color: theme.colors.white,
  onPress: () => {},
};
