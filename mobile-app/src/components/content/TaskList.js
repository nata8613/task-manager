import { StyleSheet, FlatList, View, Text } from 'react-native';
import PropTypes from 'prop-types';

import theme from '../../constants/theme';
import { statusOptions, typeOptions } from '../../constants/optionItems';

function TaskList({ items }) {
  const renderItem = (item) => {
    const statusItem = statusOptions.find(
      (status) => status.id === item.status,
    );

    const typeItem = typeOptions.find((type) => type.id === item.type);

    return (
      <View style={styles.itemContainer}>
        <View style={styles.itemRow}>
          <Text style={styles.itemTitle}>{item.title}</Text>
        </View>
        <View style={styles.itemRow}>
          <Text>Due Date: </Text>
          <Text>
            {new Date(item.dueDate).toLocaleString('en-GB', {
              dateStyle: 'short',
            })}
          </Text>
        </View>
        <View style={styles.itemRow}>
          <Text>Type:</Text>
          <Text>{typeItem.label}</Text>
        </View>
        <View style={styles.itemRow}>
          <Text>Status:</Text>
          <View style={styles.status}>
            <Text>{statusItem.label}</Text>
          </View>
        </View>
      </View>
    );
  };

  return (
    <FlatList
      data={items}
      style={styles.listContainer}
      renderItem={({ item }) => renderItem(item)}
      keyExtractor={(item) => item.id}
    />
  );
}

export { TaskList };

const styles = StyleSheet.create({
  listContainer: {
    width: '100%',
  },
  itemContainer: {
    borderRadius: 8,
    width: '100%',
    paddingVertical: 6,
    paddingHorizontal: 12,
    backgroundColor: theme.colors.white,
    elevation: 2,
    marginVertical: theme.spacing.extraSmall,
  },
  itemRow: {
    display: 'flex',
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    marginVertical: 6,
    borderBottomColor: theme.colors.gray,
    borderBottomWidth: 2,
  },
  buttonContainer: {
    display: 'flex',
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
  },
  itemTitle: {
    fontWeight: theme.typography.fontWeight.bold,
    fontSize: theme.typography.fontSize.regular,
  },
  status: {
    borderRadius: 8,
    paddingVertical: 2,
    paddingHorizontal: 12,
    backgroundColor: theme.colors.primary,
    opacity: 0.7,
    elevation: 2,
    shadowColor: 'black',
    shadowOffset: { width: 1, height: 1 },
    shadowOpacity: 0.25,
    shadowRadius: 4,
    marginVertical: 4,
  },
});

TaskList.propTypes = {
  items: PropTypes.arrayOf(PropTypes.shape({})),
};

TaskList.defaultProps = {
  items: [],
};
